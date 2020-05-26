import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProdutoClientViewComponent } from './produto-client-view.component';

describe('ProdutoClientViewComponent', () => {
  let component: ProdutoClientViewComponent;
  let fixture: ComponentFixture<ProdutoClientViewComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProdutoClientViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProdutoClientViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
