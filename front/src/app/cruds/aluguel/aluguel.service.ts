import { Injectable } from '@angular/core';
import { AluguelModel } from '../models/aluguel-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class AluguelService {

    constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<AluguelModel>> {
        return this.phpService.get(`http://localhost:5500/controller/aluguel/AluguelControllerListar.php?word=${word}`);
    }

    public insert(aluguel: AluguelModel): Observable<AluguelModel> {
        return this.phpService.post(`http://localhost:5500/controller/aluguel/AluguelControllerCadastro.php`, aluguel);
    }

    public update(aluguel: AluguelModel): Observable<AluguelModel> {
        return this.phpService.put(`http://localhost:5500/controller/aluguel/AluguelControllerAtualizar.php`, aluguel);
    }

    public delete(id: number): Observable<AluguelModel> {
        return this.phpService.delete(`http://localhost:5500/controller/aluguel/AluguelControllerDeletar.php`, id);
    }
}
