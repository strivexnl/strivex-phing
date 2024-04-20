# Strivex\Phing\Json\JsonEditTask

## How to use the JsonEditor task?
1. __Make sure Strivex\Phing is installed__
   ```php
   $ composer require strivexnl/strivex-phing 
   ```

2. __Load the autoloader in your build.xml__
   ```xml
   <property name="vendor.dir" value="${base.dir}/vendor" />
   <includepath classpath="$(vendor.dir}/autoload.php" />
   ```
     
3. __Define the custom tasks you want to use__
   ```xml
   <!-- Define the jsoneditor task -->
   <taskdef name="jsoneditor" classname="Strivex\Phing\Task\Json\JsonEditorTask" />
   ```
   
4. __Use the JsonEditor in your target__
   ```xml
   <!-- Use the jsoneditor task -->
   <jsoneditor file="${file.path.to.json}">
     <!-- You can use dot notation for the json keys! -->
     <add key="some.key" value="Wowsers!" overwrite="true" />
     <delete key="another.key" />
     <get key="name" propertyName="what.is.my.name" />
   </jsoneditor>
   ```

## Available Json Editor task
As seen in the examples above, we define the JsonEditor like `jsonedit`.
In the all our examples we will use this task name.

| Task (1)   | Class (2)      | Description                     |
|------------|----------------|---------------------------------|
| jsoneditor | JsonEditorTask | The task to edit your JSON file |

1. _We assume this task definition names._
2. _The task is in the `Strivex\Phing\Task\Json` namespace._

## Available Sub Tasks in JsonEditor
As seen in the examples above, we define the JsonEditor like `jsonedit`.
In the all our examples we will use this task name.

This are sub tasks in the json editor:

| Task                        | Description                                 | 
|-----------------------------|---------------------------------------------|
| [add](#add)                 | Adds a value to the key to the json         |
| [delete](#delete)           | Deletes the key from the json               |
| [get](#get)                 | Gets the value from the key into a property |
| [bumpversion](#bumpversion) | Bumps a (semantic) version number           |

### add
The _add_ task will add the key (with value) to the JSON.

| Parameter | Type    | Description                                          | Default | Required |
|-----------|---------|------------------------------------------------------|---------|:--------:|
| key       | String  | The key (in `dot.notation`) in the JSON              | n/a     |   yes    | 
| value     | String  | The value as string or JSON string                   | n/a     |   yes    |
| overwrite | Boolean | Whether to overwrite the key when it already exists. | true    |    no    |

Example:
```xml
<jsoneditor file="${file.path.to.json}">
   <add key="some.key" value="Some Value" overwrite="true" />
   <add key="dont.overwrite" value${some.value} overwrite="false" />
</jsoneditor>
```

### delete
The _delete_ task will delete the key from the JSON.

| Parameter | Type   | Description                           | Default | Required |
|-----------|--------|---------------------------------------|---------|:--------:|
| key       | String | The key (in `dot.notation`) to delete | n/a     |   yes    | 

Example:
```xml
<jsoneditor file="${file.path.to.json}">
   <delete key="some.key" />
</jsoneditor>
```

### get
The _get_ task will get the key from the JSON.

| Parameter    | Type   | Description                                 | Default | Required |
|--------------|--------|---------------------------------------------|---------|:--------:|
| key          | String | The key (in `dot.notation`) to get          | n/a     |   yes    | 
| propertyName | String | The name of the property to store the value | n/a     |   yes    |

Example:
```xml
<jsoneditor file="${file.path.to.json}">
   <get key="some.key.to.get" />
</jsoneditor>
```

### bumpversion
The _bumpversion_ task will bump the sementic version from the key in the JSON.

| Parameter       | Type    | Description                                                                                                    | Default | Required |
|-----------------|---------|----------------------------------------------------------------------------------------------------------------|---------|:--------:|
| key (1)         | String  | The key (in `dot.notation`) to the `version`.                                                                  | n/a     |   yes    | 
| type            | String  | Type of bump. Possible values:<br/>- `major`<br/>- `minor`<br/>- `patch`<br/>- `alpha`<br/>- `beta`<br/>- `RC` | n/a     |   yes    |
| startPreRelease | Boolean | Whether or not to start with a prerelease (`alpha`) when bumping.                                              | false   |    no    |
| overwrite       | Boolean | Whether to overwrite the key when it already exists.                                                           | true    |    no    |
1. _It is not only the `version` like in `Composer.json`. When the key contains semantic versioning, it can be bumped._

Example:
```xml
<jsoneditor file="${file.path.to.json}">
   <get key="some.key.to.get" />
</jsoneditor>
```
