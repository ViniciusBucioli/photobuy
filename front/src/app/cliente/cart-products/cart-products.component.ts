import { Component, OnInit } from '@angular/core';
import { ProdutoModel } from '../../cruds/models/produto-model.model';
import { ProdutoService } from '../../cruds/produto/produto.service';
import { ClientCart } from '../client-cart';

@Component({
  selector: 'app-cart-products',
  templateUrl: './cart-products.component.html',
  styleUrls: ['./cart-products.component.css']
})
export class CartProductsComponent implements OnInit {

    public produtos: Array<ProdutoModel> = [];

    public totalProduto: number;

    constructor(
        private produtoService: ProdutoService
    ) { }

    ngOnInit() {
        this.produtos = ClientCart.items;
        this.produtos.forEach(x => this.totalProduto += x.preco);
    }

}
