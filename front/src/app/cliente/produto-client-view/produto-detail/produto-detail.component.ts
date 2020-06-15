import { Component, OnInit } from '@angular/core';
import { ProdutoModel } from '../../../cruds/models/produto-model.model';
import { ActivatedRoute } from '@angular/router';
import { ProdutoService } from '../../../cruds/produto/produto.service';
import { ClientCart } from '../../client-cart';
import { NotificationService } from '../../../notification.service';

@Component({
  selector: 'app-produto-detail',
  templateUrl: './produto-detail.component.html',
  styleUrls: ['./produto-detail.component.css']
})
export class ProdutoDetailComponent implements OnInit {

    public product: ProdutoModel;
    public clientCart = ClientCart;
    
    constructor(
        private activatedRoute: ActivatedRoute,
        private produtoService: ProdutoService,
        private notification: NotificationService
    ) { }

    ngOnInit() {
        const id = parseInt(this.activatedRoute.snapshot.params['id'], 10);
        this.produtoService.getById(id).subscribe(
            (produto: ProdutoModel) => {
                this.product = produto;
            }
        )
    }

    public addItem() {
        ClientCart.addItem(this.product);
        this.notification.popNotification('Produto adicionado!');
    }

}
