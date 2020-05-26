import { Component, OnInit } from '@angular/core';
import { ProdutoService } from '../../cruds/produto/produto.service';
import { ProdutoModel } from '../../cruds/models/produto-model..model';
import { Globals } from '../../globals';

@Component({
  selector: 'app-produto-client-view',
  templateUrl: './produto-client-view.component.html',
  styleUrls: ['./produto-client-view.component.css']
})
export class ProdutoClientViewComponent implements OnInit {

    public produtos: Array<ProdutoModel>;

    public searchWord = '';

    constructor(
        private produtoService: ProdutoService,
        public globals: Globals
        ) { }

    ngOnInit() {
        this.getProdutos();
    }

    private getProdutos() {
        this.produtoService.search(this.searchWord).subscribe(
            (produtos: Array<ProdutoModel>) => {
                this.produtos = produtos;
            },
            this.defaultError
        );
    }
    private defaultError(e: any) {
        console.error(e);
    }
}
