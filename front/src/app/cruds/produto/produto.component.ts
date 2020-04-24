import { Component, OnInit } from '@angular/core';
import { ProdutoModel } from '../models/produto-model..model';
import { ProdutoService } from './produto.service';

@Component({
  selector: 'app-produto',
  templateUrl: './produto.component.html',
  styleUrls: ['./produto.component.css']
})
export class ProdutoComponent implements OnInit {

    public produtos: Array<ProdutoModel>;
    public selectedToEdit: number;
    public newProduto: ProdutoModel;

    constructor(
        private produtoService: ProdutoService
    ) { }

    ngOnInit() {
        this.getProdutos();
    }

    private getProdutos(){
        this.produtoService.search('').subscribe(
            (produtos: Array<ProdutoModel>) => {
                this.produtos = produtos;
            },
            this.defaultError
        );
    }

    public createProduto() {
        this.newProduto = new ProdutoModel();
    }
    public insertProduto(){
        this.produtoService.insert(this.newProduto).subscribe(
            () => {
                this.newProduto = null;
                this.getProdutos();
            },
            this.defaultError
        )
    }

    public updateProduto(produto: ProdutoModel){
        this.produtoService.update(produto).subscribe(
            (e:any) => {
                this.selectedToEdit = 0;
                this.getProdutos();
            },
            this.defaultError
        )
    }

    public deleteProduto(produto: ProdutoModel) {
        this.produtoService.delete(produto.id).subscribe(
            () => {
                this.getProdutos();
            },
            this.defaultError
        )
    }

    private defaultError(e: any){
        console.error(e);
    }

}
