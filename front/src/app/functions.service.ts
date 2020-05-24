import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class FunctionsService {

    constructor() { }

    // takes a {} object and returns a FormData object
    public objectToFormData(obj: any, form: FormData = null, namespace: any = null): FormData {
        const fd = form || new FormData();
        let formKey;

        for (const property in obj) {
            if (obj.hasOwnProperty(property)) {

                if (namespace) {
                    formKey = namespace + '[' + property + ']';
                } else {
                    formKey = property;
                }

                // if the property is an object, but not a File,
                // use recursivity.
                if (typeof obj[property] === 'object' && !(obj[property] instanceof File)) {
                    this.objectToFormData(obj[property], fd, property);
                } else {
                    // if it's a string or a File object
                    fd.append(formKey, obj[property]);
                }
            }
        }
        return fd;
    }
}

