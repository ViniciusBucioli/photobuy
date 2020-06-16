import { Injectable } from '@angular/core';
import { HttpClient, HttpParams, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';
import { NotificationService } from './notification.service';
import { FunctionsService } from './functions.service';

@Injectable({
  providedIn: 'root'
})
export class PhpService {

    private headers: any;

    constructor(
        private httpClient: HttpClient,
        private notification: NotificationService,
        private functions: FunctionsService
    ) {

        // new HttpHeaders()
        // .set('Content-Type', 'application/x-www-form-urlencoded')
        // application/x-www-form-urlencoded
        this.headers = {headers: new HttpHeaders({'Content-Type':'application/json; charset=utf-8'}) };
        // this.headers = {headers: new HttpHeaders({'Content-Type': 'application/x-www-form-urlencoded'}) };
    }

    public get<T>(url: string): Observable<any> {
        return this.httpClient.get(url)
        .pipe(tap(() => {}, this.errorLog));
    }
    public post<T>(url: string, body: any): Observable<any> {
        return this.httpClient.post(url, this.functions.objectToFormData(body))
        .pipe(tap((e: any) => {console.log(e)}, this.errorLog));
    }
    public put<T>(url: string, body: any): Observable<any> {
        return this.httpClient.post(url, this.functions.objectToFormData(body), this.headers)
        .pipe(tap(() => {}, this.errorLog));
    }
    public delete<T>(url: string, id: number): Observable<any> {
        return this.httpClient.post(url, this.toHttp({'id': id}))
        .pipe(tap(() => {}, this.errorLog));
    }
    private errorLog = (e: any) => {
      console.log(e);
      if ((typeof e.error) === 'string') {
        this.notification.popNotification(e.error);
      } else if (typeof e.error.text === 'string') {
        this.notification.popNotification(e.error.text);
      }else if (e.error.message) {
        this.notification.popNotification(e.error.message);
      } else {
        this.notification.popNotification(e.message);
      }
  }
    public toHttp(obj: any) {
        let params = new HttpParams();
        Object.keys(obj).forEach((item) => {
            params = params.set(item, obj[item]);
        });
        return params;
    }
}
