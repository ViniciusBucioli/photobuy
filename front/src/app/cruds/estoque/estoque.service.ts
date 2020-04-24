import { Injectable } from '@angular/core';
import { EstoqueModel } from '../models/estoque-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class EstoqueService {

    constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<EstoqueModel>> {
        return this.phpService.get(`http://localhost:5500/controller/estoque/EstoqueControllerListar.php?word=${word}`);
    }

    public insert(estoque: EstoqueModel): Observable<EstoqueModel> {
        return this.phpService.post(`http://localhost:5500/controller/estoque/EstoqueControllerCadastro.php`, estoque);
    }

    public update(estoque: EstoqueModel): Observable<EstoqueModel> {
        return this.phpService.put(`http://localhost:5500/controller/estoque/EstoqueControllerAtualizar.php`, estoque);
    }

    public delete(id: number): Observable<EstoqueModel> {
        return this.phpService.delete(`http://localhost:5500/controller/estoque/EstoqueControllerDeletar.php`, id);
    }
}
