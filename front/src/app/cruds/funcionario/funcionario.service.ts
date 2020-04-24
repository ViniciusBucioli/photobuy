import { Injectable } from '@angular/core';
import { FuncionarioModel } from '../models/funcionario-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class FuncionarioService {

    constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<FuncionarioModel>> {
        return this.phpService.get(`http://localhost:5500/controller/funcionario/FuncionarioControllerListar.php?word=${word}`);
    }

    public insert(funcionario: FuncionarioModel): Observable<FuncionarioModel> {
        return this.phpService.post(`http://localhost:5500/controller/funcionario/FuncionarioControllerCadastro.php`, funcionario);
    }

    public update(funcionario: FuncionarioModel): Observable<FuncionarioModel> {
        return this.phpService.put(`http://localhost:5500/controller/funcionario/FuncionarioControllerAtualizar.php`, funcionario);
    }

    public delete(id: number): Observable<FuncionarioModel> {
        return this.phpService.delete(`http://localhost:5500/controller/funcionario/FuncionarioControllerDeletar.php`, id);
    }
}
