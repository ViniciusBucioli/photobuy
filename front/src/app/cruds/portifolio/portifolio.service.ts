import { Injectable } from '@angular/core';
import { PortifolioModel } from '../models/portifolio-model..model';
import { HttpClient, HttpHeaders, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PhpService } from '../../php.service';

@Injectable({
  providedIn: 'root'
})
export class PortofolioService {

    constructor(
        private phpService: PhpService
    ) { }

    public search(word:string): Observable<Array<PortifolioModel>> {
        return this.phpService.get(`http://localhost:5500/controller/portifolio/PortifolioControllerListar.php?word=${word}`);
    }

    public insert(portifolio: PortifolioModel): Observable<PortifolioModel> {
        return this.phpService.post(`http://localhost:5500/controller/portifolio/PortifolioControllerCadastro.php`, portifolio);
    }

    public update(portifolio: PortifolioModel): Observable<PortifolioModel> {
        return this.phpService.put(`http://localhost:5500/controller/portifolio/PortifolioControllerAtualizar.php`, portifolio);
    }

    public delete(id: number): Observable<PortifolioModel> {
        return this.phpService.delete(`http://localhost:5500/controller/portifolio/PortifolioControllerDeletar.php`, id);
    }
}