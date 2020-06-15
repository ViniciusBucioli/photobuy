import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { LoginService } from '../login/login.service';
import { ClientCart } from '../cliente/client-cart';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

    public cartItem = ClientCart.items;
    public showCartView = ClientCart.show;

    constructor(
        public router: Router,
        private login: LoginService
    ) { }

    ngOnInit() {
    }

    public logout() {
        this.login.logout().subscribe();
    }

    public toggleCartView() {
        ClientCart.show = !ClientCart.show;
        console.log(ClientCart.show);
    }

}
