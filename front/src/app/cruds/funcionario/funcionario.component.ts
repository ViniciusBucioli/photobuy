import { Component, OnInit } from '@angular/core';
import { FuncionarioModel } from '../models/funcionario-model..model';
import { FuncionarioService } from './funcionario.service';

@Component({
  selector: 'app-funcionario',
  templateUrl: './funcionario.component.html',
  styleUrls: ['./funcionario.component.css']
})
export class FuncionarioComponent implements OnInit {

  export class FuncionarioComponent implements OnInit {

    public funcioanrio: Array<FuncionarioModel>;
    public selectedToEdit: number;
    public newFuncionario: FuncionarioModel;

    constructor(
        private funcionarioService: FuncionarioService
    ) { }

    ngOnInit() {
        this.getFuncionarios();
    }

    private getFuncionarios(){
        this.funcionarioService.search('').subscribe(
            (funcionarios: Array<FuncionarioModel>) => {
                this.funcionario = funcionario;
            },
            this.defaultError
        );
    }

    public createFuncionario() {
        this.newFuncionario = new FuncionarioModel();
    }
    public insertFuncionario(){
        this.funcionarioService.insert(this.newFuncionario).subscribe(
            () => {
                this.newFuncionario = null;
                this.getFuncionarios();
            },
            this.defaultError
        )
    }

    public updateFuncionario(funcionario: FuncionarioModel){
        this.funcionarioService.update(funcionario).subscribe(
            (e:any) => {
                this.selectedToEdit = 0;
                this.getFuncionarios();
            },
            this.defaultError
        )
    }

    public deleteFuncionario(funcionario: FuncionarioModel) {
        this.funcionarioService.delete(funcionario.id).subscribe(
            () => {
                this.getFuncionarios();
            },
            this.defaultError
        )
    }

    private defaultError(e: any){
        console.error(e);
    }

}
