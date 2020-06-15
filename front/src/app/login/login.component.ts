import { Component, OnInit } from '@angular/core';
import { LoginService } from './login.service';
import { Router } from '@angular/router';
import { NgForm } from '@angular/forms';
import { SessionStorageService } from '../session-storage.service';
import { NotificationService } from '../notification.service';
import { Observable } from 'rxjs';

class User {
    email: string;
    pass: string;
}

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

    public user: User = new User();

    constructor(
        private loginService: LoginService,
        private router: Router,
        private sessionStorage: SessionStorageService,
        private notification: NotificationService
    ) { }

    ngOnInit() {
        this.notification.getNotification();
    }

    public login() {
        this.loginService.login(this.user.email, this.user.pass).subscribe(
            (response: any) => {
                if (response.valid) {
                    this.router.navigateByUrl(response.path);
                }
                this.notification.popNotification(response.message);
            }
        );
    }

}
