import { Injectable } from '@angular/core';
import { HttpClient, HttpParams, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PhpService {

    private headers: any;

    constructor(
        private httpClient: HttpClient
    ) {
        this.headers = {headers: new HttpHeaders({'Content-Type':'application/json; charset=utf-8'}) };
    }

    public get<T>(url:string): Observable<any> {
        return this.httpClient.get(url);
    }
    public post<T>(url:string, body: any): Observable<any> {
        return this.httpClient.post(url,this.toHttp(body));
    }
    public put<T>(url:string, body: any): Observable<any> {
        return this.httpClient.post(url,this.toHttp(body));
    }
    public delete<T>(url:string, id: number): Observable<any> {
        return this.httpClient.post(url,this.toHttp({"id": id}));
    }

    
    public toHttp(obj: any) {
        let params = new HttpParams();
        Object.keys(obj).forEach(function (item) {  
            params = params.set(item, obj[item]);
        });
        return params;
    }
}
