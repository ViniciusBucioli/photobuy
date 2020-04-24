import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GerenteSidebarComponent } from './gerente-sidebar.component';

describe('GerenteSidebarComponent', () => {
  let component: GerenteSidebarComponent;
  let fixture: ComponentFixture<GerenteSidebarComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GerenteSidebarComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GerenteSidebarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
