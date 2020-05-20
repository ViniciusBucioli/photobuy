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
    public selectedImgFile: File;

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
    public insertProduto() {
        this.produtoService.insert(this.newProduto).subscribe(
            () => {
                this.newProduto = null;
                this.getProdutos();
            },
            this.defaultError
        )
    }

    public async updateProduto(produto: ProdutoModel) {
        // await this.produtoService.update(produto).toPromise().then(
        //     (e: any) => {
        //         this.selectedToEdit = 0;
        //         this.getProdutos();
        //     },
        //     this.defaultError
        // );
        await this.produtoService.postImg(this.selectedImgFile).toPromise().then(
          (result: boolean) => {
              if (result) {
                  debugger;
                  console.log("sucess");
              }
          }
        );
    }

    public deleteProduto(produto: ProdutoModel) {
        this.produtoService.delete(produto.id).subscribe(
            () => {
                this.getProdutos();
            },
            this.defaultError
        )
    }

    private defaultError(e: any) {
        console.error(e);
    }

    public handleFileInput(files: any) {
      this.selectedImgFile = files.item(0);
    }

}
