import { TestBed } from '@angular/core/testing';

import { AluguelService } from './aluguel.service';

describe('AluguelService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: AluguelService = TestBed.get(AluguelService);
    expect(service).toBeTruthy();
  });
});
