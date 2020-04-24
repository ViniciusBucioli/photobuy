import { Injectable } from '@angular/core';
import { PontoModel } from '../models/ponto-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class PontoService {

    constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<PontoModel>> {
        return this.phpService.get(`http://localhost:5500/controller/ponto/PontoControllerListar.php?word=${word}`);
    }

    public insert(ponto: PontoModel): Observable<PontoModel> {
        return this.phpService.post(`http://localhost:5500/controller/ponto/PontoControllerCadastro.php`, ponto);
    }

    public update(ponto: PontoModel): Observable<PontoModel> {
        return this.phpService.put(`http://localhost:5500/controller/ponto/PontoControllerAtualizar.php`, ponto);
    }

    public delete(id: number): Observable<PontoModel> {
        return this.phpService.delete(`http://localhost:5500/controller/ponto/PontoControllerDeletar.php`, id);
    }
}
