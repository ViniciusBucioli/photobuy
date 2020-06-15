import { Component, OnInit } from '@angular/core';
import { ClientCart } from './client-cart';

@Component({
  selector: 'app-cliente',
  templateUrl: './cliente.component.html',
  styleUrls: ['./cliente.component.css']
})
export class ClienteComponent implements OnInit {

    public clientCart = ClientCart;

    constructor() { }

    ngOnInit() {
    }
}
