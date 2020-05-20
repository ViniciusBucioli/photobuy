import { Injectable } from '@angular/core';
import { ClienteModel } from '../models/cliente-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class ClienteService {

  constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<ClienteModel>> {
        return this.phpService.get(`http://localhost:5500/controller/cliente/ClienteControllerListar.php?word=${word}`);
    }

    public insert(cliente: ClienteModel): Observable<ClienteModel> {
        return this.phpService.post(`http://localhost:5500/controller/cliente/ClienteControllerCadastro.php`, cliente);
    }

    public update(cliente: ClienteModel): Observable<ClienteModel> {
        return this.phpService.put(`http://localhost:5500/controller/cliente/ClienteControllerAtualizar.php`, cliente);
    }

    public delete(id: number): Observable<ClienteModel> {
        return this.phpService.delete(`http://localhost:5500/controller/cliente/ClienteControllerDeletar.php`, id);
    }
}
