### Admin Panel ###
    | app
        | Http
            | Controller
                | Admin
                    |Admin Controller
                    |ClientController
                    | > ClientDiplomaController <
                    |DiplomaController
                    |GroupController
                    |MaterialController
                    |RoundController
                    |TaskCategoryController
                    |TaskController
        | Models
            | Admin
                | > ClientDiploma <
                | Group
                | Material
                | Round
                | SolvedTask
                | Task
                | TaskCategory


    | public
        | AdminPanel
            | src
            | vendors

    | resources
        | views
            | admin
                | clients
                    {
                        | AddClient
                        | AllClient
                    }
                | diplomas
                    {
                        | AddDiploma
                        | AllDiplomas
                    }
                | groups
                    {
                        | AddGroup
                        | AddRound
                        | AllGroups
                    }
                | includes
                    {
                        | header
                        | footer
                        | sidebar
                        | top-navbar
                        | scripts
                    }
                | materials
                    {
                        | AllMaterials
                        | AddMaterial
                    }
                | tasks
                    {
                        | AllTasks
                        | AddTask
                    }
                | tasksCategories
                    {
                        | AddCategory
                        | AllCategory
                    }
                | dashboard
    
    | routes
        | admin

###############################################################################
