import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-funcionario-catalogo',
  templateUrl: './funcionario-catalogo.component.html',
  styleUrls: ['./funcionario-catalogo.component.css']
})
export class FuncionarioCatalogoComponent implements OnInit {

    public leftPage: number;
    public rightPage: number;

    public totalPage = 13;

    constructor() { }

    ngOnInit() {
        this.leftPage = 0;
        this.rightPage = 1;
    }

    public next() {
        console.log(this.leftPage);
        if (this.rightPage < 13) {
            this.leftPage += 2;
            this.rightPage += 2
        }
    }

    public previous() {
        if (this.leftPage > 0) {
            this.leftPage -= 2;
            this.rightPage -= 2
        }
    }

}
