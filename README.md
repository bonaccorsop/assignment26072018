# Currency Assignment

I divided the source code into 3 differents folder inside the 'scripts' directory.
Each assignment task folder is named by its code language.

I choose to provision the unit tests execution by building a single Docker Image using the Dockerfile at the root of the project.
This image wraps up all the project dependencies upon an alpine linux image and all dependencies are installed by bash-scripting the Docker build instructions.

#### Build and start

You can launch all the tests by building the Dockerfile using the follow command
```
cd project-directory
docker build -t pietrobonaccorso:latest .
```

This Dockerfile will build the assignment image and will do the follow tasks

  - Install system dependencies upon alpine linux
  - Copy the code base inside the image
  - Resolve code dependecies for each language (if needed)
  - Run Unit Tests for each language

#### Notes

Suddenly, I didn't write Unit Tests for Python.
I want to study the Python Unit Tests workbench soon!
I preferred to mantain focus on the functionality without being in late :)


That's all folks!

Enjoy :)