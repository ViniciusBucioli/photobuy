import { TestBed } from '@angular/core/testing';

import { PontoService } from './ponto.service';

describe('PontoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: PontoService = TestBed.get(PontoService);
    expect(service).toBeTruthy();
  });
});
