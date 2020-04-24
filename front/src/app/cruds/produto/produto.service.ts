import { Injectable } from '@angular/core';
import { ProdutoModel } from '../models/produto-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class ProdutoService {

    constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<ProdutoModel>> {
        return this.phpService.get(`http://localhost:5500/controller/produto/ProdutoControllerListar.php?word=${word}`);
    }

    public insert(produto: ProdutoModel): Observable<ProdutoModel> {
        return this.phpService.post(`http://localhost:5500/controller/produto/ProdutoControllerCadastro.php`, produto);
    }

    public update(produto: ProdutoModel): Observable<ProdutoModel> {
        return this.phpService.put(`http://localhost:5500/controller/produto/ProdutoControllerAtualizar.php`, produto);
    }

    public delete(id: number): Observable<ProdutoModel> {
        return this.phpService.delete(`http://localhost:5500/controller/produto/ProdutoControllerDeletar.php`, id);
    }
}
