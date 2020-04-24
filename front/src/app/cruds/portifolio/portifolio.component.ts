import { Component, OnInit } from '@angular/core';
import { PortifolioService } from '../models/portifolio-model..model';
import { PortifolioService } from './portifolio.service';


@Component({
  selector: 'app-portifolio',
  templateUrl: './portifolio.component.html',
  styleUrls: ['./portifolio.component.css']
})
 export class PortifolioComponent implements OnInit {

    public portifolios: Array<PortifolioModel>;
    public selectedToEdit: number;
    public newPortifolio: PortifolioModel;

    constructor(
        private PortifolioService: PortifolioService
    ) { }

    ngOnInit() {
        this.getPortifolio();
    }

    private getPortifolio(){
        this.PortifolioService.search('').subscribe(
            (portifolios: Array<PortifolioModel>) => {
                this.portifolios = portifolios;
            },
            this.defaultError
        );
    }

    public createPortifolios() {
        this.newPortifolio = new PortifolioModel();
    }
    public insertPortifolio(){
        this.PortifolioService.insert(this.newPortifolio).subscribe(
            () => {
                this.newPortifolio = null;
                this.getPortifolio();
            },
            this.defaultError
        )
    }

    public updatePortifolio(portifolio: PortifolioModel){
        this.PortifolioService.update(portifolio).subscribe(
            (e:any) => {
                this.selectedToEdit = 0;
                this.getPortifolio();
            },
            this.defaultError
        )
    }

    public deletePortifolio(portifolio: PortifolioModel) {
        this.PortifolioService.delete(portifolio.id).subscribe(
            () => {
                this.getPortifolio();
            },
            this.defaultError
        )
    }

    private defaultError(e: any){
        console.error(e);
    }

}
