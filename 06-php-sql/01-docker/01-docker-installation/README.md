# PHP with Docker

## The "why"

Like any good recipe, we start with the ingredients.
What do we actually need in our installation?

- PHP
- Apache
- MySQL or MariaDB
- phpMyAdmin

Nice, we already know that but how do you create an environment to make it all work together?

Some tools provide all of these services in one installation like [XAMPP (Linux)](https://www.apachefriends.org/faq_linux.html) or [Laragon (Windows)](https://laragon.org/).
If you're already familiar with one of those, feel free to use it.

However, a tool like XAMPP has limited possibilities and can be overwhelming when you have to switch on production mode. 

Today, development teams expect to be able to test code in production-like environments. Doing this allows teams to deploy code with confidence. For this to happen, local development environments need to be identical (or as close as possible) to the production environments the code runs on.

**Docker** fixes these problems and many more. The ability to have isolated environments between projects, test code with different versions easily, and do both these things with a small footprint on your computer performances are only a few of the reasons Docker is now used by developers.

## Installation

First of all, you need to install Docker and Docker Compose. 

## Install `docker` & `docker compose`

### For macOS

Follow the procedure on [this page](https://docs.docker.com/docker-for-mac/install/).

### For Windows

Follow the procedure on [this page](https://docs.docker.com/docker-for-windows/install/)

You will need to [install WSL2](https://docs.microsoft.com/en-us/windows/wsl/install) with a Linux distribution. I advise you to install Ubuntu. Your computer should also allow for virtualization.

>💡 Advice : to be able to use the Linux Terminal, install "Terminal" via the Microsoft store. 

#### Check in your PowerShell

- To check the version of WSL : `wsl --list --verbose`
- to change WSL version to 2 : `wsl --set-default-version 2` or `wsl --set-version [distro_name] [wsl_version_number]
`

### For Linux

1. Follow the procedure on [this page](https://docs.docker.com/install/linux/docker-ce/ubuntu/)
1. Run the following command to fix a possible right issue : `sudo usermod -a -G docker $USER`
1. Follow the procedure on [the page](https://docs.docker.com/compose/cli-command/#install-on-linux)
1. Restart your computer

To test your installation, run the command `docker run hello-world`.

## Next step 

Done ? You can start working on installing and booting your future work environment in the [next chapter](../02-docker-environment).
