import { Component, OnInit } from '@angular/core';
import { ProdutoModel } from '../../cruds/models/produto-model.model';
import { ProdutoService } from '../../cruds/produto/produto.service';
import { ClientCart } from '../client-cart';
import { ModalComponent } from '../../modal/modal.component';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-check-out',
  templateUrl: './check-out.component.html',
  styleUrls: ['./check-out.component.css']
})
export class CheckOutComponent implements OnInit {

    public produtos: Array<ProdutoModel> = [];

    public totalProduto: number;

    constructor(
        private produtoService: ProdutoService,
        private modalService: NgbModal,
    ) { }

    ngOnInit() {
        this.produtos = ClientCart.items;
        this.produtos.forEach(x => this.totalProduto += x.preco);
        console.log(this.produtos);
        console.log(this.totalProduto);
    }

    public pay() {
        const modalRef = this.modalService.open(ModalComponent);
        modalRef.componentInstance.title = 'Pago com sucesso!';
        modalRef.componentInstance.text = 'Muito obrigado pela preferência!';
        ClientCart.clear();
    }

}
