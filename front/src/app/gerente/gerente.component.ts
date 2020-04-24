import { Component, OnInit } from '@angular/core';
import { GerenteSidebarEnum } from '../enums/gerente-sidebar.enum';

@Component({
  selector: 'app-gerente',
  templateUrl: './gerente.component.html',
  styleUrls: ['./gerente.component.css']
})
export class GerenteComponent implements OnInit {

    public menuSelected: GerenteSidebarEnum;
    public menu: typeof GerenteSidebarEnum = GerenteSidebarEnum;

    constructor() { }

    ngOnInit() {
        this.menuSelected = this.menu.produtos;
    }

  public menuChanged(selected: GerenteSidebarEnum) {
      this.menuSelected = selected;
  }

}
