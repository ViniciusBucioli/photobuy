import { Component, OnInit } from '@angular/core';
import { EstoqueModel } from '../models/estoque-model..model';
import { EstoqueService } from './estoque.service';

@Component({
  selector: 'app-estoque',
  templateUrl: './estoque.component.html',
  styleUrls: ['./estoque.component.css']
})
export class EstoqueComponent implements OnInit {

  public estoque: Array<EstoqueModel>;

    public selectedToEdit: number;
    public newEstoque: EstoqueModel;

    constructor(
        private estoqueService: EstoqueService
    ) { }

    ngOnInit() {
        this.getEstoque();
    }

    private getEstoque(){
        this.estoqueService.search('').subscribe(
            (estoques: Array<EstoqueModel>) => {
                this.estoques = estoques;
            },
            this.defaultError
        );
    }

    public createEstoque() {
        this.newEstoque = new EstoqueModel();
    }
    public insertEstoque(){
        this.estoqueService.insert(this.newEstoque).subscribe(
            () => {
                this.newEstoque = null;
                this.getEstoques();
            },
            this.defaultError
        )
    }

    public updateEstoque(estoque: EstoqueModel){
        this.estoqueService.update(estoque).subscribe(
            (e:any) => {
                this.selectedToEdit = 0;
                this.getEstoque();
            },
            this.defaultError
        )
    }

    public deleteEstoque(estoque: EstoqueModel) {
        this.estoqueService.delete(estoque.id).subscribe(
            () => {
                this.getEstoques();
            },
            this.defaultError
        )
    }

    private defaultError(e: any){
        console.error(e);
    }
}
