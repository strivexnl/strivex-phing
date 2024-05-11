# Build File Strivex Commons

## How to use the strivex-commons.xml build file.

To take advantage of the `strivex-commons.xml` build file, import it to your own build file.

## Setup your build file.

Before you import the `strivex-commons.xml`, you can set several properties. When you omit them, they will be asked for or they will use some default value.

| Name          | Type   | Default value         | Required | Description                  |
|---------------|--------|-----------------------|:--------:|------------------------------|
| package.name  | String | ${phing.project.name} |   yes    | Path to the Git executable   |
| exe.git       | String | n/a                   |   yes    | Path to the Git executable   |
| exe.phing     | String | n/a                   |   yes    | Path to the Phing executable | 
| file.autoload | String | n/a                   |   yes    | Path to the autoload.php     |

Example:
```xml
<?xml version="1.0" encoding="UTF-8" ?>
<project name="YourProject">
    
    <!-- Set properties being used in strivex-commons.xml to avoid inputs -->
    <resolvepath propertyName="exe.git" value="./../git.exe" />
    <resolvepath propertyName="exe.phing" value="./../vendor/phing/phing/bin/phing" />
    <resolvepath propertyName="file.autoload" value="./../vendor/autoload.php" />
    
    <import file="./../strivex-phing/buildfiles/strivex-commons.xml" />
    
    <!-- Do your thing! -->
    
</project>
```

## Available custom tasks.

When using the `strivex-commons.xml` build file in your build files, you will get some custom task definitions.
For more information on those custom tasks definitions, please read the README.md for the specific definitions.

- [lowercase](./../task/string/String.md#tolowercasetask)
- [uppercase](./../task/string/String.md#tolowercasetask)
- [pascalcase](./../task/string/String.md#tolowercasetask)
- [camelcase](./../task/string/String.md#tolowercasetask)
- [snakecase](./../task/string/String.md#tolowercasetask)
- [kebabcase](./../task/string/String.md#tolowercasetask)
- [stringcase](./../task/string/String.md#tolowercasetask)
- [jsonedit](./../task/json/JsonEditor.md)

## Available properties.

You have access to some properties created in `strivex-commons.xml`.

| Name                    | Type   | Value          | Description                       | Availability           |
|-------------------------|--------|----------------|-----------------------------------|------------------------|
| text.tab                | String | &#9;           | Value of a tab                    | yes                    |
| text.enter              | String | &#10;          | Value of a new line               | yes                    |
| file.autoload _1_       | String | _user defined_ | Path to the autoload file         | yes                    |
| exe.git _1_             | String | _user defined_ | Path to the Git executable        | yes                    |
| exe.phing _1_           | string | _user defined_ | Path to the Phing executable      | yes                    |
| package.name            | String | _user defined_ | Name of the package               | yes                    |
| package.name.lowercase  | String |                | Name of the package in lowercase  | yes, after params.init |
| package.name.uppercase  | String |                | Name of the package in UPPERCASE  | yes, after params.init |
| package.name.pascalcase | String |                | Name of the package in PascalCase | yes, after params.init |
| package.name.camelcase  | String |                | Name of the package in camelCase  | yes, after params.init |
| package.name.snakecase  | String |                | Name of the package in snake_case | yes, after params.init |
| package.name.kebabcase  | String |                | Name of the package in kebab-case | yes, after params.init |

_1. These properties can be set before importing `strivex-commons.xml`._


## Target: params.init

In the `strivex-commons.xml` is a target `params.init`. In this target we will extend some properties that
can be used in your targets. Also some required properties will be checked and when needed be asked for.

Use this target as the last dependency in your targets, so you always have all the properties! You can use the same
setup in your own build scripts. Create a `params.init` target that will call the `params.init` in the 
`strivex-commons.xml` and use your magic there. Use your `params.init` as the last dependencies in your targets.

