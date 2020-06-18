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
        // this.headers = {headers: new HttpHeaders({'Content-Type': 'application/json; charset=utf-8'}) };
        this.headers = {headers: new HttpHeaders({'Content-Type': 'application/x-www-form-urlencoded'}) };
        // this.headers = {headers: new HttpHeaders({'Content-Type': 'multipart/form-data; boundary=fotobuy'}) };
    }

    public get<T>(url: string): Observable<any> {
        return this.httpClient.get(url)
        .pipe(tap(() => {}, (e: any) => this.errorLog(e, null)));
    }
    public post<T>(url: string, body: any): Observable<any> {
        return this.httpClient.post(url, this.functions.objectToFormData(body))
        .pipe(tap((e: any) => { console.log(e); }, (e: any) => { this.errorLog(e, body); }));
    }
    public put<T>(url: string, body: any): Observable<any> {
        return this.httpClient.request('PUT', url, { body: this.toHttp(body), headers: this.headers })
        .pipe(tap((e: any) => { console.log(e); }, (e: any) => {
            this.errorLog(e, body);
        }));
        // return this.httpClient.put(url, this.functions.objectToFormData(body), this.headers)
        // .pipe(tap((e: any) => { console.log(e); }, (e: any) => {
        //     this.errorLog(e, body);
        // }));
    }
    public delete<T>(url: string, id: number): Observable<any> {
        const body = { id };
        return this.httpClient.request('delete', url, { body: this.toHttp(body), headers: this.headers })
        .pipe(tap((e: any) => {
            if (e.message) {
                this.notification.popNotification(e.message);
            }
        }, (e: any) => {
            this.errorLog(e, body);
        }));
        // return this.httpClient.post(url, this.toHttp({'id': id}))
        // .pipe(tap(() => {}, (e: any) => this.errorLog(e, null)));
    }
    private errorLog = (e: any, body:any) => {
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
        if(body) {
        console.log(body);
        let bulk = '';
        Object.keys(body).forEach((key) => {
            const value = body[key];
            bulk += key + ':' + body[key] + '\n';
        });
        console.log(bulk);
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
