import { Component, OnInit } from '@angular/core';
import { ClienteModel } from '../models/cliente-model..model';
import { ClienteService } from './cliente.service';

@Component({
  selector: 'app-cliente',
  templateUrl: './cliente.component.html',
  styleUrls: ['./cliente.component.css']
})
export class ClienteComponent implements OnInit {

  public clientes: Array<ClienteModel>;
  public selectedToEdit: number;
  public newCliente: ClienteModel;

  constructor(
      private clienteService: ClienteService
  ) { }

  ngOnInit() {
      this.getClientes();
  }

  private getClientes(){
      this.clienteService.search('').subscribe(
          (clientes: Array<ClienteModel>) => {
              this.clientes = clientes;
          },
          this.defaultError
      );
  }

  public createCliente() {
      this.newCliente = new ClienteModel();
  }
  public insertCliente(){
      this.clienteService.insert(this.newCliente).subscribe(
          () => {
              this.newCliente = null;
              this.getClientes();
          },
          this.defaultError
      )
  }

  public updateCliente(cliente: ClienteModel){
      this.clienteService.update(cliente).subscribe(
          (e:any) => {
              this.selectedToEdit = 0;
              this.getClientes();
          },
          this.defaultError
      )
  }

  public deleteCliente(cliente: ClienteModel) {
      this.clienteService.delete(cliente.id).subscribe(
          () => {
              this.getClientes();
          },
          this.defaultError
      )
  }

  private defaultError(e: any){
      console.error(e);
  }

}