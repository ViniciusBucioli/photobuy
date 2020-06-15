import { Injectable } from '@angular/core';
import { PhpService } from '../php.service';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

    constructor(
        private server: PhpService
    ) { }

    public login(email: string, pass: string): Observable<{ path: string, message: string }> {
        return this.server.post(`http://localhost:5500/controller/session/login.php`, { email: email, pass: pass });
    }

    public checkLogin(): Observable<{ valid: boolean }> {
        return this.server.get(`http://localhost:5500/controller/session/checkSession.php`);
    }

    public logout(): Observable<void> {
        return this.server.get(`http://localhost:5500/controller/session/logout.php`);
    }

}
