package org.example.ws;

import jakarta.jws.WebMethod;
import jakarta.jws.WebParam;
import jakarta.jws.WebService;

import java.util.Date;
import java.util.List;

//POJO PLAIN OLA JAVA OBJECT :
@WebService(serviceName = "banqueWS")
public class BanqueService {

    @WebMethod(operationName = "convert")
    public double convertion(@WebParam(name = "montant") double mt){
        return mt*10.5;
    }
    @WebMethod
    public Compte getCompte(@WebParam(name = "code") int code){
        return new Compte(code,Math.random()*9541,new Date());
    }
    @WebMethod
    public List<Compte> listComptes(){
        return List.of(
                new Compte(1,Math.random()*9541,new Date()),
                new Compte(2,Math.random()*9541,new Date()),
                new  Compte(3,Math.random()*9541,new Date()),
                new  Compte(4,Math.random()*9541,new Date())

        );
    }
}
