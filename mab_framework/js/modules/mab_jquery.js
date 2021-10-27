class   		AjaxPromise {
    constructor(promise) {
        this.promise = promise;
    }

    done(callback) {
        this.promise = this.promise.then((data) => {
            callback(data);
            return (data);
        });
        return (this);
    }

    fail(callback) {
        this.promise = this.promise.catch(callback);
        return (this);
    }

    always(callback) {
        this.promise = this.promise.finally(callback);
        return (this);
    }
}

class   		ElementCollection extends Array {
    ready(callback) {
        const   isReady = this.some((e) => {
            return (e.readyState != null && e.readyState != "loading");
        });
        
        if (isReady) {
            callback();
        }
        else {
            document.addEventListener("DOMContentLoaded", callback);
        }
        return (this);
    }
    
    on(event, callbackOrSelector, callback) {
        if (typeof(callbackOrSelector) === "function") {
            this.forEach((e) => {
                e.addEventListener(event, callbackOrSelector);
            });
        }
        else {
            this.forEach((elem) => {
                elem.addEventListener(event, (e) => {
                    if (e.target.matches(callbackOrSelector))
                    callback(e);
                });
            });
        }
        return (this);
    }
    
    next() {
        return (this.map(e => e.nextElementSibling).filter(e => e != null));
    }
    
    prev() {
        return (this.map(e => e.previousElementSibling).filter(e => e != null));
    }
    
    addClass(className) {
        this.forEach((e) => {
            e.classList.add(className);
        });
        return (this);
    }
    
    removeClass(className) {
        this.forEach((e) => {
            e.classList.remove(className);
        });
        return (this);
    }
    
    css(property, value) {
        this.forEach((e) => {
            e.style[property] = value;
        });
        return (this);
    }
}

export function	mab_$(param) {
    if (typeof(param) === "string" || param instanceof String) {
        return (new ElementCollection(...document.querySelectorAll(param)));
    }
    else {
        return (new ElementCollection(param));
    }
}

mab_$.ajax = function ({ url, method, body = {}, contentType, success = () => {} }) {
    const   queryString     = Object.entries(body)
        .map(([key, value]) => { return (`${key}=${value}`); })
        .join('&');
    const   fetch_params    = method == "GET" ?
        { method: method, headers: { "Content-Type": contentType, }, } :
        { method: method, body: body, headers: { "Content-Type": contentType, }, };
    
    url = method == "GET" ? `${url}?${queryString}` : url;
    return (new AjaxPromise(
        fetch(url, fetch_params)
            .then((res) => {
                if (res.ok) {
                    // return (res.json());
                    return (res.text());
                }
                else {
                    throw (new Error(res.status));
                }
            })
            .then((data) => {
                success();
                return (data);
            })
    ));
};


export default	mab_$;
