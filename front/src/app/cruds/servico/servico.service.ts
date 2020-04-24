import { Injectable } from '@angular/core';
import { ServicoModel } from '../models/servico-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class ServicoService {

    constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<ServicoModel>> {
        return this.phpService.get(`http://localhost:5500/controller/servico/ServicoontrollerListar.php?word=${word}`);
    }

    public insert(servico: ServicoModel): Observable<ServicoModel> {
        return this.phpService.post(`http://localhost:5500/controller/servico/ServicoControllerCadastro.php`, servico);
    }

    public update(servico: ServicoModel): Observable<ServicoModel> {
        return this.phpService.put(`http://localhost:5500/controller/servico/ServicoControllerAtualizar.php`, servico);
    }

    public delete(id: number): Observable<ServicoModel> {
        return this.phpService.delete(`http://localhost:5500/controller/servico/ServicoControllerDeletar.php`, id);
    }
}