import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-ponto',
  templateUrl: './ponto.component.html',
  styleUrls: ['./ponto.component.css']
})
export class PontoComponent implements OnInit {

  export class PontoComponent implements OnInit {

    public ponto: Array<PontoModel>;
    public selectedToEdit: number;
    public newPonto: PontoModel;

    constructor(
        private pontoService: PontoService
    ) { }

    ngOnInit() {
        this.getPonto();
    }

    private getPonto(){
        this.pontoService.search('').subscribe(
            (pontos: Array<PontoModel>) => {
                this.pontos = pontos;
            },
            this.defaultError
        );
    }

    public createPonto() {
        this.newPonto = new PontoModel();
    }
    public insertPonto(){
        this.pontoService.insert(this.newPonto).subscribe(
            () => {
                this.newPonto = null;
                this.getPonto();
            },
            this.defaultError
        )
    }

    public updateponto(ponto: PontoModel){
        this.pontoService.update(ponto).subscribe(
            (e:any) => {
                this.selectedToEdit = 0;
                this.getPonto();
            },
            this.defaultError
        )
    }

    public deletePonto(ponto: PontoModel) {
        this.pontoService.delete(ponto.id).subscribe(
            () => {
                this.getPonto();
            },
            this.defaultError
        )
    }

    private defaultError(e: any){
        console.error(e);
    }

}
