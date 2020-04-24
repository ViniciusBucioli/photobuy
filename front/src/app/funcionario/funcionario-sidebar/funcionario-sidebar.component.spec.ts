import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioSidebarComponent } from './funcionario-sidebar.component';

describe('FuncionarioSidebarComponent', () => {
  let component: FuncionarioSidebarComponent;
  let fixture: ComponentFixture<FuncionarioSidebarComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioSidebarComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioSidebarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
