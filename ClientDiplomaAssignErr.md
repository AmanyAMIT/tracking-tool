###### Database ######
    Clients
    Diplomas
    ClientDiplomas

##### Controller ######
    Admin
        ClientDiplomaController

##### Route #####
    admin

###### Models ######
    Client -> with a relationship of hasMany with Diploma
    Diploma -> with a relationshop of hasMany with Client
    ClientDiploma -> with a relationship of belongToMany with Diploma and Client

##### Blabdes ######
    admin
        clients
            AssignToDiploma