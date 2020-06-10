    var Ziggy = {
        namedRoutes: {"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"register":{"uri":"register","methods":["GET","HEAD"],"domain":null},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"],"domain":null},"password.email":{"uri":"password\/email","methods":["POST"],"domain":null},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"domain":null},"password.update":{"uri":"password\/reset","methods":["POST"],"domain":null},"password.confirm":{"uri":"password\/confirm","methods":["GET","HEAD"],"domain":null},"countries":{"uri":"countries","methods":["GET","HEAD"],"domain":null},"provinces":{"uri":"country\/{id}\/provinces","methods":["GET","HEAD"],"domain":null},"cities":{"uri":"province\/{id}\/cities","methods":["GET","HEAD"],"domain":null},"towns":{"uri":"city\/{id}\/towns","methods":["GET","HEAD"],"domain":null},"country":{"uri":"country\/{id}","methods":["GET","HEAD"],"domain":null},"province":{"uri":"province\/{id}","methods":["GET","HEAD"],"domain":null},"city":{"uri":"city\/{id}","methods":["GET","HEAD"],"domain":null},"town":{"uri":"town\/{id}","methods":["GET","HEAD"],"domain":null},"admin.home":{"uri":"admin\/dashboard","methods":["GET","HEAD"],"domain":null},"roles.index":{"uri":"admin\/roles","methods":["GET","HEAD"],"domain":null},"roles.store":{"uri":"admin\/roles","methods":["POST"],"domain":null},"roles.new":{"uri":"admin\/roles\/new","methods":["GET","HEAD"],"domain":null},"roles.edit":{"uri":"admin\/roles\/{id}\/edit","methods":["GET","HEAD"],"domain":null},"roles.update":{"uri":"admin\/roles\/{id}\/update","methods":["PUT"],"domain":null},"roles.show":{"uri":"admin\/roles\/{id}","methods":["GET","HEAD"],"domain":null},"roles.destroy":{"uri":"admin\/roles\/{id}","methods":["DELETE"],"domain":null},"permissions.index":{"uri":"admin\/permissions\/{id}","methods":["GET","HEAD"],"domain":null},"permissions.store":{"uri":"admin\/permissions\/{id}","methods":["POST"],"domain":null},"permissions.new":{"uri":"admin\/permissions\/\/{id}\/new","methods":["GET","HEAD"],"domain":null},"permissions.edit":{"uri":"admin\/permissions\/{id}\/edit","methods":["GET","HEAD"],"domain":null},"permissions.update":{"uri":"admin\/permissions\/{id}\/update","methods":["PUT"],"domain":null},"permissions.destroy":{"uri":"admin\/permissions\/{id}","methods":["DELETE"],"domain":null},"users.index":{"uri":"admin\/users","methods":["GET","HEAD"],"domain":null},"users.store":{"uri":"admin\/users","methods":["POST"],"domain":null},"users.new":{"uri":"admin\/users\/new","methods":["GET","HEAD"],"domain":null},"users.show":{"uri":"admin\/users\/{id}\/show","methods":["GET","HEAD"],"domain":null},"users.edit":{"uri":"admin\/users\/{id}\/edit","methods":["GET","HEAD"],"domain":null},"users.update":{"uri":"admin\/users\/{id}\/update","methods":["PUT"],"domain":null},"users.destroy":{"uri":"admin\/users\/{id}","methods":["DELETE"],"domain":null},"users.getpersons":{"uri":"admin\/users\/persons","methods":["GET","HEAD"],"domain":null},"persons.index":{"uri":"persons","methods":["GET","HEAD"],"domain":null},"persons.store":{"uri":"persons","methods":["POST"],"domain":null},"persons.new":{"uri":"persons\/new","methods":["GET","HEAD"],"domain":null},"persons.show":{"uri":"persons\/{id}\/show","methods":["GET","HEAD"],"domain":null},"persons.edit":{"uri":"persons\/{id}\/edit","methods":["GET","HEAD"],"domain":null},"persons.update":{"uri":"persons\/{id}\/update","methods":["PUT"],"domain":null},"persons.destroy":{"uri":"persons\/{id}","methods":["DELETE"],"domain":null}},
        baseUrl: 'http://localhost:8000/mercadomadera/public',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }
