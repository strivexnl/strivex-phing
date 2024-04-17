# Strivex Phing

This package has some nice additions to Phing.

## How to install?

Follow these steps to install and use the custom tasks.

1. __Install Strivex Phing__
Install Strivex Phing by using composer.
```shell
$ composer require strivexnl/strivex-phing
```

2. __Load the autoloader in your build.xml__ 
```xml
<property name="vendor.dir" value="${base.dir}/vendor" />
<includepath classpath="$(vendor.dir}/autoload.php" />
```

3. __Define the custom tasks you want to use__
```xml
<taskdef name="tolowercase" classname="Strivex\Phing\Task\String\ToLowerCaseTask" />
```

4. __Use the custom task in your target__
```xml
<target name="test">
    <property name="some.text" value="Some Big Words" />
    <tolowercase input="${some.text}" propertyName="some.text.lowercase" />
    
    <echo msg="Result: ${some.text.lowercase}" />
</target> 
```

Here is the complete example:

```xml
<?xml version="1.0" encoding="UTF-8" ?>
<project name="Strivex Phing Example" default="test" basedir=".">

    <!-- Include the autoloader -->
    <property name="vendor.dir" value="${base.dir}/vendor" />
    <includepath classpath="$(vendor.dir}/autoload.php" />

    <!-- Define the custom task -->
    <taskdef name="tolowercase" classname="Strivex\Phing\Task\String\ToLowerCaseTask" />

    <target name="test">
        <!-- Text to use as an example -->
        <property name="some.text" value="Some Big Words" />
        
        <!-- Use the task as defined in taskdef -->
        <tolowercase input="${some.text}" propertyName="some.text.lowercase" />

        <!-- Echo the result -->
        <echo msg="Result: ${some.text.lowercase}" />
    </target>

</project>
```

## Custom Tasks
We have created some custom tasks that can be used in your Phing project.

*Assumptions: You have defined the custom tasks with taskdef in your build file, using the suggested task name.*

### ToLowerCaseTask (tolowercase)
The ToLowerCaseTask can be used to transform text to lowercase and put it in a property.

| Name  | Type   | Description     | Default | Required |
|-------|--------|-----------------|:----|:--------:|
| input | String | The text to use | n/a |   yes    |
| propertyName | String | The name of the property to set. | n/a |   yes    |

Example:
```xml
<tolowercase input="${some.text}" propertyName="some.text.lowercase" />
```

### ToUpperCaseTask (touppercase)
The ToUpperCaseTask can be used to transform text to uppercase and put it in a property.

| Name  | Type   | Description     | Default | Required |
|-------|--------|-----------------|:----|:--------:|
| input | String | The text to use | n/a |   yes    |
| propertyName | String | The name of the property to set. | n/a |   yes    |

Example:
```xml
<touppercase input="${some.text}" propertyName="some.text.uppercase" />
```

