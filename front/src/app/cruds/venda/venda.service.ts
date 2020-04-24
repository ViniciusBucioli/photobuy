import { Injectable } from '@angular/core';
import { VendaModel } from '../models/venda-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class VendaService {

    constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<VendaModel>> {
        return this.phpService.get(`http://localhost:5500/controller/venda/VendaControllerListar.php?word=${word}`);
    }

    public insert(venda: VendaModel): Observable<VendaModel> {
        return this.phpService.post(`http://localhost:5500/controller/venda/VendaControllerCadastro.php`, venda);
    }

    public update(venda: VendaModel): Observable<VendaModel> {
        return this.phpService.put(`http://localhost:5500/controller/venda/VendaControllerAtualizar.php`, venda);
    }

    public delete(id: number): Observable<VendaModel> {
        return this.phpService.delete(`http://localhost:5500/controller/venda/VendaControllerDeletar.php`, id);
    }
}