pipeline {
 agent any
     stages {
            stage("Build") {
                steps {
                    sh 'php --version'
                    sh 'composer install'
                    sh 'composer --version'
                    sh 'cp .env.example .env'
                    sh 'php artisan key:generate'
                }
            }
            stage("Unit test") {
                steps{
                    script{
                                            try {
                                               sh 'php artisan test'
                                            }
                                            catch(err) {
                                               echo "Caught: ${err}"
                                               currentBuild.result = 'FAILURE'
                                            }
                                            //step([$class: 'Mailer', recipients: 'berisha@beyeribia.de'])
                    }
                }

            }
     }
}




