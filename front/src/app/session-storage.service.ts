import { Injectable } from '@angular/core';

const SESSION_STORAGE_KEY = 'photobuy';

interface INotificationStorage {
    message: string;
    onRouter: string;
}
@Injectable({
  providedIn: 'root'
})
export class SessionStorageService {

    private readonly notificationKey = 'notification';

  constructor() { }

    // Get All Items
    // fetch(): ISessionItem[] {
    //     return JSON.parse(localStorage.getItem(SESSION_STORAGE_KEY)) || [];
    // }

    addNotification(notifiaction: INotificationStorage) {
        localStorage.setItem(this.notificationKey, JSON.stringify(notifiaction));
    }
    getNotification(): INotificationStorage {
        const notification = JSON.parse(localStorage.getItem(this.notificationKey)) || [];
        localStorage.removeItem(this.notificationKey);
        return notification;
    }

  // Delete all
  clear(): void {
      localStorage.removeItem(SESSION_STORAGE_KEY);
  }

  // Save
//   add(item: ISessionItem): void {
//       const items = this.fetch().concat(item);
//       localStorage.setItem(SESSION_STORAGE_KEY, JSON.stringify(items));
//   }

  // Delete
//   delete(item: ISessionItem): void {
//       const items = this.fetch();
//       const filteredItems = items.filter((_item) => {
//           return _item.id !== item.id;
//       });

//       localStorage.setItem(SESSION_STORAGE_KEY, JSON.stringify(filteredItems));
//   }

}
