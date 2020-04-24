import { Injectable } from '@angular/core';

const SESSION_STORAGE_KEY = 'kovacks_producoes';

// Aplicar algum tipo de segurança
interface ISessionItem {
    id: number;
    email: string;
    pass: string;
}

@Injectable({
  providedIn: 'root'
})
export class SessionStorageService {

  constructor() { }
 
  // Get All Items  
  fetch(): ISessionItem[] {
      return JSON.parse(localStorage.getItem(SESSION_STORAGE_KEY)) || [];
  }

  // Delete all
  clear(): void {
      localStorage.removeItem(SESSION_STORAGE_KEY);
  }

  // Save
  add(item: ISessionItem): void {
      const items = this.fetch().concat(item);
      localStorage.setItem(SESSION_STORAGE_KEY, JSON.stringify(items));
  }

  // Delete
  delete(item: ISessionItem): void {
      const items = this.fetch();
      const filteredItems = items.filter((_item) => {
          return _item.id !== item.id;
      });

      localStorage.setItem(SESSION_STORAGE_KEY, JSON.stringify(filteredItems));
  }
}
