package org.example;

import proxy.BanqueService;
import proxy.BanqueWS;
import proxy.Compte;

public class JwsClient {
    public static void main(String[] args) {
        //créer le middleware qui va nous permettre d'interagir avecle service distant :
        BanqueService stub = new BanqueWS().getBanqueServicePort();
        System.out.println(stub.convert(45));
        Compte cnt = stub.getCompte(77);
        System.out.println(cnt.getCode());
        System.out.println(cnt.getSolde());
    }
}
