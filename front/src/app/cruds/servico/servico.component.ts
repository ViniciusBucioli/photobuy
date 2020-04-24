import { Component, OnInit } from '@angular/core';
import { ServicoModel } from '../models/servico-model..model';
import { ServicoService } from './servico.service';

@Component({
  selector: 'app-servico',
  templateUrl: './servico.component.html',
  styleUrls: ['./servico.component.css']
})
export class ServicoComponent implements OnInit {

  export class ServicoComponent implements OnInit {

    public servicos: Array<ServicoModel>;
    public selectedToEdit: number;
    public newServico: ServicoModel;

    constructor(
        private servicoService: ServicoService
    ) { }

    ngOnInit() {
        this.getServico();
    }

    private getServico(){
        this.servicoService.search('').subscribe(
            (servicos: Array<ServicoModel>) => {
                this.servicos = servicos;
            },
            this.defaultError
        );
    }

    public createServico() {
        this.newServico = new ServicoModel();
    }
    public insertServico(){
        this.servicoService.insert(this.newServico).subscribe(
            () => {
                this.newServico = null;
                this.getServico();
            },
            this.defaultError
        )
    }

    public updateServico(servico: ServicoModel){
        this.servicoService.update(servico).subscribe(
            (e:any) => {
                this.selectedToEdit = 0;
                this.getServico();
            },
            this.defaultError
        )
    }

    public deleteServuci(servico: ServicoModel) {
        this.servicoService.delete(servico.id).subscribe(
            () => {
                this.getServico();
            },
            this.defaultError
        )
    }

    private defaultError(e: any){
        console.error(e);
    }

}
