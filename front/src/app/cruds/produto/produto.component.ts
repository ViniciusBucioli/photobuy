import { Component, OnInit, Injector, Inject, PLATFORM_ID } from '@angular/core';
import { ProdutoModel } from '../models/produto-model..model';
import { ProdutoService } from './produto.service';
import { NgbModal, NgbModalRef } from '@ng-bootstrap/ng-bootstrap';
import { Globals } from '../../globals';
import { isPlatformBrowser } from '@angular/common';
import { ImageModalComponent } from '../../modal/image-modal/image-modal.component';

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
    public activeImgModal: number;

    constructor(
        private modalService: NgbModal,
        private produtoService: ProdutoService,
        public globals: Globals
    ) { }

    ngOnInit() {
        this.getProdutos();
    }

    private getProdutos() {
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
    public async insertProduto() {
        if (this.selectedImgFile) {
            this.newProduto.imgFile = this.selectedImgFile;
        }
        await this.produtoService.insert(this.newProduto).toPromise().then(
            () => {
                this.newProduto = null;
                this.getProdutos();
            },
            this.defaultError
        );
    }

    public async updateProduto(produto: ProdutoModel) {
        this.produtoService.update(produto).toPromise().then(
            (e: any) => {
                this.selectedToEdit = 0;
                this.getProdutos();
            },
            this.defaultError
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

    public handleFileInput(files: File) {
        this.selectedImgFile = files;
    }

    public openImgModal(produto: ProdutoModel) {
        const modalRef = this.modalService.open(ImageModalComponent);
        modalRef.componentInstance.title = produto.nome;
        modalRef.componentInstance.img = produto.imgPath;
    }

}
