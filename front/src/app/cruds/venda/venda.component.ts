import { Component, OnInit } from '@angular/core';
import { VendaModel } from '../models/venda-model..model';
import { VendaService } from './venda.service';

@Component({
  selector: 'app-venda',
  templateUrl: './venda.component.html',
  styleUrls: ['./venda.component.css']
})
export class VendaComponent implements OnInit {

  export class VendaComponent implements OnInit {

    public Vendas: Array<VendaModel>;
    public selectedToEdit: number;
    public newVenda: VendaModel;

    constructor(
        private vendaService: VendaService
    ) { }

    ngOnInit() {
        this.getVendas();
    }

    private getVendas(){
        this.VendaService.search('').subscribe(
            (vendas: Array<VendaModel>) => {
                this.vendas = vendas;
            },
            this.defaultError
        );
    }

    public createVenda() {
        this.newVenda = new VendaModel();
    }
    public insertVendas(){
        this.VendaService.insert(this.newVenda).subscribe(
            () => {
                this.newVenda = null;
                this.getVendas();
            },
            this.defaultError
        )
    }

    public updateVenda(venda: VendaModel){
        this.VendaService.update(venda).subscribe(
            (e:any) => {
                this.selectedToEdit = 0;
                this.getVendas();
            },
            this.defaultError
        )
    }

    public deleteVenda(venda: VendaModel) {
        this.VendaService.delete(venda.id).subscribe(
            () => {
                this.getVendas();
            },
            this.defaultError
        )
    }

    private defaultError(e: any){
        console.error(e);
    }

}
