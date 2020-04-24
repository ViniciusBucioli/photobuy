import { Component, OnInit } from '@angular/core';
import { AluguelModel } from '../models/aluguel-model..model';
import { AluguelService } from './aluguel.service';


@Component({
  selector: 'app-aluguel',
  templateUrl: './aluguel.component.html',
  styleUrls: ['./aluguel.component.css']
})
export class AluguelComponent implements OnInit {

  public alugueis: Array<AluguelModel>;
    public selectedToEdit: number;
    public newAluguel: AluguelModel;

    constructor(
        private aluguelService: AluguelService
    ) { }

    ngOnInit() {
        this.getAluguel();
    }

    private getAluguel(){
        this.aluguelService.search('').subscribe(
            (alugueis: Array<AluguelModel>) => {
                this.alugueis = alugueis;
            },
            this.defaultError
        );
    }

    public createAluguel() {
        this.newAluguel = new AluguelModel();
    }
    public insertAluguel(){
        this.aluguelService.insert(this.newAluguel).subscribe(
            () => {
                this.newAluguel = null;
                this.getAluguel();
            },
            this.defaultError
        )
    }

    public updateAluguel(aluguel: AluguelModel){
        this.aluguelService.update(aluguel).subscribe(
            (e:any) => {
                this.selectedToEdit = 0;
                this.getAluguel();
            },
            this.defaultError
        )
    }

    public deleteAluguel(aluguel: AluguelModel) {
        this.aluguelService.delete(aluguel.id).subscribe(
            () => {
                this.getAluguel();
            },
            this.defaultError
        )
    }

    private defaultError(e: any){
        console.error(e);
    }

}
