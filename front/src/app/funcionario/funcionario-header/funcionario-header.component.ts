import { Component, OnInit } from '@angular/core';
import { LoginService } from '../../login/login.service';
import { Router } from '@angular/router';
import { NotificationService } from '../../notification.service';

@Component({
  selector: 'app-funcionario-header',
  templateUrl: './funcionario-header.component.html',
  styleUrls: ['./funcionario-header.component.css']
})
export class FuncionarioHeaderComponent implements OnInit {

    constructor(
        private loginService: LoginService,
        private router: Router,
        private notificationService: NotificationService
    ) { }

    ngOnInit() {
    }

    public logout(){
        this.loginService.logout().subscribe(
            () => {
                this.router.navigateByUrl('/');
            },
            (e: any) => {
                this.notificationService.popNotification(e.message);
            }
        );
    }

}
